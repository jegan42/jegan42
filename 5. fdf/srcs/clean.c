/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   clean.c                                            :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/07/06 16:38:29 by jeagan            #+#    #+#             */
/*   Updated: 2019/07/09 14:08:25 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "f_d_f.h"

static void	clean_ptr(t_var *old)
{
	if (old->ptr->bonus)
		free(old->ptr->bonus);
	if (old->ptr->image)
		free(old->ptr->image);
	if (old->ptr->img)
		mlx_destroy_image(old->ptr->mlx, old->ptr->img);
	if (old->ptr->win)
		mlx_destroy_window(old->ptr->mlx, old->ptr->win);
	if (old->ptr)
		free(old->ptr);
}

static void	clean(t_var *old)
{
	clean_ptr(old);
	if (old->name)
		free(old->name);
	if (old->file)
		free(old->file);
	if (old->line)
		free(old->line);
	if (old->tab)
		free_tab(old->tab, NULL, 0);
	if (old->tb_l)
		free_tab(old->tb_l, NULL, 0);
	if (old->tb)
		free_tab(old->tb, NULL, 0);
	if (old->add_color)
		free_tab(old->add_color, NULL, 0);
	if (old->stck)
		free_tab(NULL, old->stck, old->height);
	if (old)
		free(old);
}

void		free_tab(char **lks, int ***lks_i, int height)
{
	int	i;
	int j;

	i = -1;
	if (lks)
	{
		while (lks[++i])
			free(lks[i]);
		free(lks[i]);
		free(lks);
	}
	if (lks_i)
	{
		while (++i < 2)
		{
			j = -1;
			while (++j < height)
				free(lks_i[i][j]);
			free(lks_i[i]);
		}
		free(lks_i);
	}
}

int			free_err(t_var *old, int err, char *err_mess)
{
	static int	check_err = {0};

	if (err > check_err)
	{
		ft_putstr_fd("[ERROR] >>>> ", 2);
		ft_putendl_fd(err_mess, 2);
		ft_putendl_fd("[USAGE] >>>> ./fdf 'valide map'.", 2);
		check_err = err;
	}
	if (err < 0)
		ft_putendl_fd(err_mess, 1);
	if (old)
	{
		close(old->fd);
		if (old && err > check_err)
			clean(old);
	}
	if (err < -1)
		exit(EXIT_SUCCESS);
	return (0);
}
