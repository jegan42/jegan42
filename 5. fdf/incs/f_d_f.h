/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   f_d_f.h                                            :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/06/08 17:09:38 by jeagan            #+#    #+#             */
/*   Updated: 2019/07/09 14:11:34 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#ifndef F_D_F_H
# define F_D_F_H
# include "libft.h"
# include <math.h>
# include <fcntl.h>
# include <mlx.h>

# define SIZE		3

# if SIZE == 0
#  define WIN_WIDTH 600
#  define WIN_HEIGHT 600
# elif SIZE == 1
#  define WIN_WIDTH 800
#  define WIN_HEIGHT 600
# elif SIZE == 2
#  define WIN_WIDTH 1920
#  define WIN_HEIGHT 1080
# elif SIZE == 3
#  define WIN_WIDTH 2560
#  define WIN_HEIGHT 1440
# else
#  define WIN_WIDTH 600
#  define WIN_HEIGHT 600
# endif

# define C_WHITE				(0xFFFFFF)
# define C_RED					(0xFF0000)
# define C_GREEN				(0x00FF00)
# define C_BLUE					(0x0000FF)
# define HUD_HEIGHT				(225)
# define HUD_WIDTH				(195)
# define HUD_WOFFSET			(20)
# define HUDX					(WIN_WIDTH - 205)

# define KEY_ESCAPE				(53)
# define KEY_PAD_1				(83)
# define KEY_PAD_2				(84)
# define KEY_PAD_7				(89)
# define KEY_PAD_8				(91)
# define KEY_PAD_ADD			(69)
# define KEY_PAD_SUB			(78)
# define KEY_CLEAR				(71)
# define KEY_PAD_DOT			(65)
# define KEY_PAD_DIVIDE			(75)
# define KEY_PAD_EQUAL			(81)
# define KEY_PAD_MULTIPLY 		(67)
# define KEY_LEFT				(123)
# define KEY_RIGHT				(124)
# define KEY_DOWN				(125)
# define KEY_UP					(126)

# include <stdio.h>

typedef struct	s_line
{
	int x;
	int y;
	int	x0;
	int	x1;
	int	y0;
	int	y1;
	int start_color;
	int end_color;
}				t_line;

typedef struct	s_coord
{
	int		dx;
	int		sx;
	int		dy;
	int		sy;
	int		err;
	int		e2;
}				t_coord;

typedef	struct	s_bonus
{
	float				z;
	float				xmv;
	float				ymv;
	float				zrot;
	int					zoom;
	unsigned char		debug;
	unsigned char		hud;
	unsigned char		iso;
	unsigned char		extra;
	int					value;
	unsigned int		color;
}				t_bonus;

typedef struct	s_ptr
{
	void		*mlx;
	void		*win;
	void		*img;
	char		*image;
	int			bpp;
	int			effect_bpp;
	int			s_l;
	int			endian;
	int			index;
	t_bonus		*bonus;
}				t_ptr;

typedef struct	s_var
{
	int			fd;
	char		*file;
	char		*name;
	int			width;
	int			height;
	int			***stck;
	int			width_tmp;
	char		*line;
	char		*leaks;
	int			ret;
	char		**tab;
	int			ok;
	int			i;
	int			j;
	char		**tb_l;
	char		**tb;
	char		**add_color;
	t_ptr		*ptr;
}				t_var;

void			free_tab(char **lks, int ***lks_i, int height);
int				free_err(t_var *old, int err, char *err_mess);

int				stock_pt(t_var *try);

int				init_win(t_var *try);
void			write_pixel(int x, int y, int color, t_var *try);
int				run_win(t_var *try);

void			draw_win(t_var *try);

void			draw_map(t_var *try);

int				hook(int key, t_var *try);
int				x_even(t_var *try);

int				get_color(t_line *line);
void			coord_assign(t_coord *coord, t_line *line);
char			*put_nb_buf(char *buf, long nb, size_t size);

#endif
