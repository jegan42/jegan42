/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   utils.c                                            :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/07/05 12:10:06 by jeagan            #+#    #+#             */
/*   Updated: 2019/07/06 13:51:20 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "f_d_f.h"

static double			percent(int start, int end, int curr)
{
	double			place;
	double			dist;

	place = curr - start;
	dist = end - start;
	return ((dist == 0) ? 1.0 : (place / dist));
}

static unsigned char	get_light(unsigned char start, unsigned char end,
									double val_percent)
{
	return ((int)((1 - val_percent) * start + val_percent * end));
}

int						get_color(t_line *line)
{
	unsigned char	red;
	unsigned char	green;
	unsigned char	blue;
	double			val_percent;

	if (line->start_color == line->end_color)
		return (line->start_color);
	if ((line->x1 - line->x0) > (line->y1 - line->y0))
		val_percent = percent(line->x0, line->x1, line->x);
	else
		val_percent = percent(line->y0, line->y1, line->y);
	red = get_light((line->start_color >> 16) & 0xFF,
			(line->end_color >> 16) & 0xFF, val_percent);
	green = get_light((line->start_color >> 8) & 0xFF,
			(line->end_color >> 8) & 0xFF, val_percent);
	blue = get_light(line->start_color & 0xFF,
			line->end_color & 0xFF, val_percent);
	return ((red << 16) | (green << 8) | blue);
}

void					coord_assign(t_coord *c, t_line *l)
{
	c->dx = (l->x1 - l->x0) >= 0 ? (l->x1 - l->x0) : (l->x0 - l->x1);
	c->sx = l->x0 < l->x1 ? 1 : -1;
	c->dy = (l->y1 - l->y0) >= 0 ? (l->y1 - l->y0) : (l->y0 - l->y1);
	c->sy = l->y0 < l->y1 ? 1 : -1;
	c->err = (c->dx > c->dy ? c->dx : -c->dy) / 2;
	l->x = l->x0;
	l->y = l->y0;
}

char					*put_nb_buf(char *buf, long nb, size_t size)
{
	int i;
	int neg;

	if (size <= 1)
	{
		buf[0] = '\0';
		return (buf);
	}
	i = size - 1;
	buf[--i] = '\0';
	neg = nb < 0;
	if (nb == 0)
		buf[--i] = '0';
	while (i >= 0 && nb != 0)
	{
		buf[--i] = '0' + ((nb % 10) >= 0 ? (nb % 10) : -(nb % 10));
		nb /= 10;
	}
	if (i >= 0 && neg)
		buf[--i] = '-';
	return (i <= 0 ? buf : buf + i);
}
